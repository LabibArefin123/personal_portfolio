 @extends('adminlte::page')

 @section('title', 'Create Project')

 @section('css')
     <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_base.css') }}">
     <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_header.css') }}">
     <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_fields.css') }}">
     <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_upload.css') }}">
     <link rel="stylesheet" href="{{ asset('css/backend/project_page/form_part/project_form_responsive.css') }}">
 @stop

 @section('content_header')
     <div class="project-form-page-header project-reveal">
         <div class="project-form-heading">
             <span class="project-form-eyebrow">PORTFOLIO MANAGEMENT</span>
             <h1>Create New Project</h1>
             <p>Add a new project to your portfolio and showcase your work.</p>
         </div>

         <a href="{{ route('projects.index') }}" class="project-back-btn">
             <i class="fas fa-arrow-left"></i>
             <span>Back to Projects</span>
         </a>
     </div>
 @stop

 @section('content')
     <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="project-form"
         id="projectForm">

         @csrf

         <div class="project-form-card project-reveal">

             <div class="project-form-card-header">
                 <div class="project-form-card-icon">
                     <i class="fas fa-folder-plus"></i>
                 </div>

                 <div>
                     <h3>Project Information</h3>
                     <p>Fill in the details below to create your project.</p>
                 </div>
             </div>

             <div class="project-form-card-body">

                 @if ($errors->any())
                     <div class="project-validation-summary">
                         <i class="fas fa-exclamation-circle"></i>
                         <div>
                             <strong>Please check the following fields:</strong>
                             <ul>
                                 @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                 @endforeach
                             </ul>
                         </div>
                     </div>
                 @endif

                 <div class="project-form-section">
                     <div class="project-form-section-heading">
                         <span class="project-section-number">01</span>
                         <div>
                             <h4>Basic Details</h4>
                             <p>Give your project a title and describe its technology.</p>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6 project-form-group">
                             <label for="title">Project Title <span>*</span></label>
                             <input type="text" id="title" name="title" class="form-control"
                                 value="{{ old('title') }}" placeholder="Enter project title" required>
                             @error('title')
                                 <small class="project-field-error">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="col-md-6 project-form-group">
                             <label for="tech_stack">Tech Stack</label>
                             <input type="text" id="tech_stack" name="tech_stack" class="form-control"
                                 value="{{ old('tech_stack') }}" placeholder="Laravel, MySQL, Bootstrap">
                             @error('tech_stack')
                                 <small class="project-field-error">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="col-md-12 project-form-group">
                             <label for="description">Project Description</label>
                             <textarea id="description" name="description" rows="6" class="form-control"
                                 placeholder="Describe your project, its features, and purpose...">{{ old('description') }}</textarea>
                             @error('description')
                                 <small class="project-field-error">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>
                 </div>

                 <div class="project-form-divider"></div>

                 <div class="project-form-section">
                     <div class="project-form-section-heading">
                         <span class="project-section-number">02</span>
                         <div>
                             <h4>Project Links</h4>
                             <p>Add links where visitors can explore your project.</p>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6 project-form-group">
                             <label for="live_url">Live URL</label>
                             <div class="project-input-icon">
                                 <i class="fas fa-globe"></i>
                                 <input type="url" id="live_url" name="live_url" class="form-control"
                                     value="{{ old('live_url') }}" placeholder="https://example.com">
                             </div>
                             @error('live_url')
                                 <small class="project-field-error">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="col-md-6 project-form-group">
                             <label for="github_url">GitHub URL</label>
                             <div class="project-input-icon">
                                 <i class="fab fa-github"></i>
                                 <input type="url" id="github_url" name="github_url" class="form-control"
                                     value="{{ old('github_url') }}" placeholder="https://github.com/username/project">
                             </div>
                             @error('github_url')
                                 <small class="project-field-error">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>
                 </div>

                 <div class="project-form-divider"></div>

                 <div class="project-form-section">
                     <div class="project-form-section-heading">
                         <span class="project-section-number">03</span>
                         <div>
                             <h4>Project Image</h4>
                             <p>Upload a cover image to represent your project.</p>
                         </div>
                     </div>

                     <div class="project-upload-area" id="projectUploadArea">
                         <input type="file" name="image" id="projectImage" accept="image/*" hidden>

                         <div class="project-upload-content" id="projectUploadContent">
                             <div class="project-upload-icon">
                                 <i class="fas fa-cloud-upload-alt"></i>
                             </div>
                             <h5>Choose a project image</h5>
                             <p>Click here to browse an image from your device</p>
                             <span>Image files only</span>
                         </div>

                         <div class="project-image-preview" id="projectImagePreview">
                             <img src="" alt="Project image preview" id="projectPreviewImage">
                             <button type="button" class="project-remove-image" id="removeProjectImage">
                                 <i class="fas fa-times"></i>
                             </button>
                             <span>Image preview</span>
                         </div>
                     </div>

                     @error('image')
                         <small class="project-field-error">{{ $message }}</small>
                     @enderror
                 </div>

                 <div class="project-form-divider"></div>

                 <div class="project-form-section">
                     <div class="project-form-section-heading">
                         <span class="project-section-number">04</span>
                         <div>
                             <h4>Publishing Settings</h4>
                             <p>Control the visibility and featured status of your project.</p>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-md-6 project-form-group">
                             <label for="status">Project Status</label>
                             <select name="status" id="status" class="form-control">
                                 <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>Published
                                 </option>
                                 <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Draft</option>
                             </select>
                         </div>

                         <div class="col-md-6 project-form-group">
                             <label for="is_highlight">Featured Project</label>
                             <select name="is_highlight" id="is_highlight" class="form-control">
                                 <option value="0" {{ old('is_highlight', '0') == '0' ? 'selected' : '' }}>No
                                 </option>
                                 <option value="1" {{ old('is_highlight') === '1' ? 'selected' : '' }}>Yes</option>
                             </select>
                         </div>
                     </div>
                 </div>

             </div>

             <div class="project-form-card-footer">
                 <a href="{{ route('projects.index') }}" class="project-cancel-btn">
                     <i class="fas fa-times"></i>
                     Cancel
                 </a>

                 <button type="submit" class="project-submit-btn">
                     <i class="fas fa-save"></i>
                     Create Project
                 </button>
             </div>
         </div>
     </form>
 @stop

 @section('js')
     <script src="{{ asset('js/custom_backend/project_page/form_part/project_form.js') }}"></script>
 @stop
