<div class="card">

    <div class="card-body">

        <form action="" wire:submit.prevent="save">

             <!-- alert -->
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                {{ Lang::get('Capacítate does not generate SCORM content. Capacítate presents the content in SCORM packages to learners, and saves data from learner interactions with the SCORM package') }}
            </div>

            <!--title -->
            <div class="form-group">
                {!! Form::label('title', Lang::get('Title')) !!}
                <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                <input type="text" :value="title" wire:model="title" class="form-control" placeholder="Ingresa el título del recurso">
                {{-- {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid': ''), 'placeholder' => 'Ingresa el título del recurso']) !!} --}}
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- file -->
            <div class="mb-4 bg-light px-2 py-2">
                <div class="form-group">
                    <label for="origin_file">{{ Lang::get('Package file') }}</label>


                    <input wire:model="origin_file" type="file" id="origin_file" class="form-control-file">

                </div>
                <div class="mt-1">
                    <input type="submit" value="Upload zip file" name="upload" class="btn btn-accent">
                </div>


                <!-- alpine progress bar -->
                <div wire:loading wire:target="origin_file"
                x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
                </div>

                {{-- <div class="text-primary mt-1" wire:loading wire:target="origin_file">
                    {{ Lang::get('Loading...') }}
                </div> --}}

                @error('origin_file')
                    <span class="text-warning">{{ $message }}</span>
                @enderror
            </div>




            <div class="form-group">
                {!! Form::label('entry_url', 'URL (Optional)') !!}
                <span class="tooltip ml-2">
                    <i class="fas fa-question-circle text-secondary tooltiptext" style="cursor: help;" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresa la URL del curso si deseas que el usuario pueda acceder directamente a este recurso."></i>
                </span>
                {!! Form::text('entry_url', null, ['class' => 'form-control', 'placeholder' => 'Introduce la URL del recurso']) !!}
                @error('entry_url')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row g-2">
                <!-- resource version -->
                <div class="col-md-3 form-group">
                    {!! Form::label('version', Lang::get('Version')) !!}
                    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                    <input type="text" :value="verion" wire:model="version" class="form-control" placeholder="{{ Lang::get('Resource version') }}">
                    {{-- {!! Form::text('version', null, ['class' => 'form-control' . ($errors->has('version') ? ' is-invalid': ''), 'placeholder' => 'Resource version']) !!} --}}
                    @error('version')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- resource identifier -->
                <div class="col-md-9 form-group">
                    {!! Form::label('identifier', Lang::get('Identifier')) !!}
                    <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                    <input type="text" :value="identifier" wire:model="identifier" class="form-control" placeholder="{{ Lang::get('Resource Identifier') }}">
                    {{-- {!! Form::text('identifier', null, ['class' => 'form-control' . ($errors->has('identifier') ? ' is-invalid': ''), 'placeholder' => 'Resource Identifier']) !!} --}}
                    @error('identifier')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            <div class="row g-2">
                <!-- aspect ratio -->
                <div class="col-md-3 form-group mb-3">
                    {!! Form::label('ratio', Lang::get('Dimensions')) !!}
                    {!! Form::select('ratio', $ratios, null, ['class' => 'form-control', 'placeholder' => Lang::get('Select dimensions')]) !!}
                </div>

            </div>

            <div class="p-4">
                <sup><i class="fas fa-asterisk text-danger fa-xs required"></i></sup>
                <small class="text-danger">{{ Lang::get('Required fields') }}</small>
            </div>

        </form>

    </div>

</div>



