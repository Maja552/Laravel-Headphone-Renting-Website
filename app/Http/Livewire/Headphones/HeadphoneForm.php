<?php

namespace App\Http\Livewire\Headphones;

use App\Http\Livewire\Form;
use App\Models\Headphone;
use App\Rules\YearRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class HeadphoneForm extends Form
{
    use WithFileUploads;

    public string $tableName = 'headphone';
    public string $tableNamePlural = 'headphones';
    public string $className = Headphone::class;

    public Headphone $headphone;
    public $image;
    public $imageUrl;
    public $imageExists;

    public function rules() {
        return [
            'headphone.name' => [
                'required',
                'string',
                'min:2',
                'unique:'.$this->tableNamePlural.',name' .
                ($this->editMode
                    ? (',' . $this->headphone->id)
                    : ''
                )
            ],
            'headphone.idManufacturer' => [
                'required',
                'integer',
                'exists:manufacturers,id'
            ],
            'headphone.idDrivertechnology' => [
                'required',
                'integer',
                'exists:drivertechnologies,id'
            ],
            'headphone.idFittype' => [
                'required',
                'integer',
                'exists:fittypes,id'
            ],
            'headphone.idBacktype' => [
                'required',
                'integer',
                'exists:backtypes,id'
            ],
            'headphone.releaseYear' => [
                'required',
                new YearRule('headphones.attributes.releaseYear'),
                'min:4'
            ],
            'headphone.weight' => [
                'required',
                'integer'
            ],
            'headphone.impedance' => [
                'required',
                'integer'
            ],
            'headphone.driverSize' => [
                'required',
                'string',
                'min:3'
            ],
            'headphone.sensitivity' => [
                'required',
                'integer'
            ],
            'headphone.sensitivityUnit' => [
                'required',
                'string',
                'min:1'
            ],
            'headphone.image' => [
                'nullable',
                'image'
            ]
        ];
    }

    public function validationAttributes() {
        return [
            'name' => Str::lower( __($this->tableNamePlural.'.attributes.name') ),
            'idManufacturer' => Str::lower( __($this->tableNamePlural.'.attributes.idManufacturer') ),
            'idDrivertechnology' => Str::lower( __($this->tableNamePlural.'.attributes.idDrivertechnology') ),
            'idFittype' => Str::lower( __($this->tableNamePlural.'.attributes.idFittype') ),
            'idBacktype' => Str::lower( __($this->tableNamePlural.'.attributes.idBacktype') ),
            'releaseYear' => Str::lower( __($this->tableNamePlural.'.attributes.releaseYear') ),
            'weight' => Str::lower( __($this->tableNamePlural.'.attributes.weight') ),
            'impedance' => Str::lower( __($this->tableNamePlural.'.attributes.impedance') ),
            'driverSize' => Str::lower( __($this->tableNamePlural.'.attributes.driverSize') ),
            'sensitivity' => Str::lower( __($this->tableNamePlural.'.attributes.sensitivity') ),
            'sensitivityUnit' => Str::lower( __($this->tableNamePlural.'.attributes.sensitivityUnit') ),
            'image' => Str::lower( __($this->tableNamePlural.'.attributes.image') )
        ];
    }

    public function mount(Headphone $headphone, Bool $editMode) {
        $this->headphone = $headphone;
        $this->imageChange();
        $this->editMode = $editMode;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        if ($this->editMode) {
            $this->authorize('update', $this->headphone);
        } else {
            $this->authorize('create', Headphone::class);
        }

        $this->validate();

        $headphone = $this->headphone;
        $image = $this->image;

        DB::transaction(function () use ($headphone, $image) {
            $headphone->save();
            if ($image !== null) {
                $headphone->image = $headphone->id . '.' . $this->image->getClientOriginalExtension();
                $headphone->save();
            }
        });

        if ($this->image !== null) {
            $this->image->storeAs(
                '',
                $this->headphone->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('headphones.messages.successes.updated', ['name' => $this->headphone->name])
                : __('headphones.messages.successes.stored', ['name' => $this->headphone->name])
        );
        $this->editMode = true;
        $this->imageChange();
    }

    public function confirmDeleteImage()
    {
        $this->dialog()->confirm([
            'title' => __('headphones.dialogs.image_delete.title'),
            'description' => __('headphones.dialogs.image_delete.description', [
                'name' => $this->headphone->name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'deleteImage',
            ],
            'reject' => [
                'label' => __('translation.no'),
            ],
        ]);
    }

    public function deleteImage()
    {
        if (Storage::disk('public')->delete($this->headphone->image)) {
            $this->headphone->image = null;
            $this->headphone->save();
            $this->imageChange();
            $this->notification()->success(
                $title = __('translation.messages.successes.destroyed_title'),
                $description = __('headphones.messages.successes.image_deleted', [
                    'name' => $this->headphone->name
                ])
            );
            return;
        }
        $this->notification()->error(
            $title = __('translation.messages.errors.destroy_title'),
            $description = __('headphones.messages.errors.image_deleted', [
                'name' => $this->headphone->name
            ])
        );
    }

    protected function imageChange()
    {
        $this->imageExists = $this->headphone->imageExists();
        $this->imageUrl = $this->headphone->imageUrl();
    }
}
