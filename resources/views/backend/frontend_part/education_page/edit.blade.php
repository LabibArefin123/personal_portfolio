
@extends('adminlte::page')

@section('title', 'Edit Education Page')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_education.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend/frontend_part/education_page/edit_page/edit_resp.css') }}">
@endsection

@section('content_header')
    <div class="edu-edit-heading">
        <div>
            <span class="edu-edit-eyebrow">CONTENT MANAGEMENT / EDUCATION</span>
            <h1>Edit Education Page</h1>
            <p>Update your academic profile, qualifications and development information.</p>
        </div>

        <a href="{{ route('education_pages.show', $education_page->id) }}" class="edu-edit-back">
            <i class="fas fa-arrow-left"></i> Back to Details
        </a>
    </div>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger edu-validation-alert">
            <strong><i class="fas fa-exclamation-circle mr-2"></i>Please check the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('education_pages.update', $education_page->id) }}"
        method="POST"
        id="educationEditForm">

        @csrf
        @method('PUT')

        {{-- PAGE INFORMATION --}}
        <div class="edu-edit-card">

            <div class="edu-edit-card-header">
                <div class="edu-edit-card-icon purple">
                    <i class="fas fa-window-maximize"></i>
                </div>
                <div>
                    <h4>Page Information</h4>
                    <p>Configure the education page hero section.</p>
                </div>
            </div>

            <div class="edu-edit-card-body">
                <div class="row">

                    <div class="col-md-8">
                        <div class="form-group edu-form-group">
                            <label>Page Title <span>*</span></label>
                            <input type="text"
                                name="title"
                                class="form-control"
                                value="{{ old('title', $education_page->title) }}"
                                required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group edu-form-group">
                            <label>Page Visibility</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ old('is_active', $education_page->is_active) ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ !old('is_active', $education_page->is_active) ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group edu-form-group">
                            <label>Hero Subtitle</label>
                            <textarea name="subtitle" class="form-control" rows="2">{{ old('subtitle', $education_page->subtitle) }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- ACADEMIC PROFILE --}}
        <div class="edu-edit-card">

            <div class="edu-edit-card-header">
                <div class="edu-edit-card-icon blue">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <h4>Academic Profile</h4>
                    <p>Manage your academic introduction and result highlight.</p>
                </div>
            </div>

            <div class="edu-edit-card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group edu-form-group">
                            <label>Introduction Title <span>*</span></label>
                            <input type="text"
                                name="intro_title"
                                class="form-control"
                                value="{{ old('intro_title', $education_page->intro_title) }}"
                                required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group edu-form-group">
                            <label>Highlight Value</label>
                            <input type="text"
                                name="highlight_value"
                                class="form-control"
                                placeholder="3.52 / 4.00"
                                value="{{ old('highlight_value', $education_page->highlight_value) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group edu-form-group">
                            <label>Highlight Label</label>
                            <input type="text"
                                name="highlight_label"
                                class="form-control"
                                placeholder="B.Sc. CGPA"
                                value="{{ old('highlight_label', $education_page->highlight_label) }}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group edu-form-group">
                            <label>Introduction Description</label>
                            <textarea name="intro_description"
                                class="form-control"
                                rows="4">{{ old('intro_description', $education_page->intro_description) }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- ACADEMIC QUALIFICATIONS --}}
        <div class="edu-edit-card">

            <div class="edu-edit-card-header">
                <div class="edu-edit-card-icon green">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <h4>Academic Qualifications</h4>
                    <p>Add, update or remove academic records and timeline entries.</p>
                </div>

                <button type="button" class="edu-add-btn" id="addEducation">
                    <i class="fas fa-plus"></i> Add Qualification
                </button>
            </div>

            <div class="edu-edit-card-body">
                <div id="educationRows">

                    @php
                        $educationRows = old('educations', $educations->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'year' => $item->year,
                                'degree' => $item->degree,
                                'institution' => $item->institution,
                                'result' => $item->result,
                                'status' => $item->status,
                                'timeline_description' => $item->timeline_description,
                                'sort_order' => $item->sort_order,
                                'is_active' => $item->is_active,
                            ];
                        })->toArray());
                    @endphp

                    @foreach ($educationRows as $index => $item)
                        <div class="edu-qualification-form" data-row>

                            <div class="edu-qualification-form-header">
                                <div>
                                    <span class="edu-row-index">RECORD {{ $loop->iteration }}</span>
                                    <strong>{{ $item['degree'] ?? 'New Qualification' }}</strong>
                                </div>

                                <button type="button" class="edu-remove-btn" data-remove-row>
                                    <i class="fas fa-trash-alt"></i> Remove
                                </button>
                            </div>

                            <input type="hidden"
                                name="educations[{{ $index }}][id]"
                                value="{{ $item['id'] ?? '' }}">

                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group edu-form-group">
                                        <label>Year</label>
                                        <input type="number"
                                            name="educations[{{ $index }}][year]"
                                            class="form-control"
                                            value="{{ $item['year'] ?? '' }}"
                                            min="1900"
                                            max="2100">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group edu-form-group">
                                        <label>Degree <span>*</span></label>
                                        <input type="text"
                                            name="educations[{{ $index }}][degree]"
                                            class="form-control"
                                            value="{{ $item['degree'] ?? '' }}"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group edu-form-group">
                                        <label>Institution <span>*</span></label>
                                        <input type="text"
                                            name="educations[{{ $index }}][institution]"
                                            class="form-control"
                                            value="{{ $item['institution'] ?? '' }}"
                                            required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group edu-form-group">
                                        <label>Result</label>
                                        <input type="text"
                                            name="educations[{{ $index }}][result]"
                                            class="form-control"
                                            value="{{ $item['result'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group edu-form-group">
                                        <label>Status</label>
                                        <select name="educations[{{ $index }}][status]" class="form-control">
                                            @foreach (['Completed', 'Running', 'On Hold', 'Discontinued'] as $status)
                                                <option value="{{ $status }}"
                                                    {{ ($item['status'] ?? 'Completed') === $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group edu-form-group">
                                        <label>Sort Order</label>
                                        <input type="number"
                                            name="educations[{{ $index }}][sort_order]"
                                            class="form-control"
                                            value="{{ $item['sort_order'] ?? ($index + 1) }}"
                                            min="0">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group edu-form-group">
                                        <label>Visibility</label>
                                        <select name="educations[{{ $index }}][is_active]" class="form-control">
                                            <option value="1" {{ !empty($item['is_active']) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ empty($item['is_active']) ? 'selected' : '' }}>Hidden</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group edu-form-group">
                                        <label>Timeline Description</label>
                                        <textarea name="educations[{{ $index }}][timeline_description]"
                                            class="form-control"
                                            rows="2">{{ $item['timeline_description'] ?? '' }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

                <div id="educationEmpty" class="edu-no-records" style="{{ count($educationRows) ? 'display:none' : '' }}">
                    <i class="fas fa-graduation-cap"></i>
                    <p>No qualifications added yet.</p>
                    <button type="button" class="edu-add-btn" id="addEducationEmpty">
                        Add First Qualification
                    </button>
                </div>
            </div>
        </div>

        {{-- GITHUB INFORMATION --}}
        <div class="edu-edit-card">

            <div class="edu-edit-card-header">
                <div class="edu-edit-card-icon dark">
                    <i class="fab fa-github"></i>
                </div>
                <div>
                    <h4>GitHub Information</h4>
                    <p>Configure your GitHub profile and contribution graph.</p>
                </div>
            </div>

            <div class="edu-edit-card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group edu-form-group">
                            <label>GitHub Username</label>
                            <input type="text"
                                name="github_username"
                                class="form-control"
                                value="{{ old('github_username', $education_page->github_username) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group edu-form-group">
                            <label>GitHub Profile URL</label>
                            <input type="url"
                                name="github_url"
                                class="form-control"
                                value="{{ old('github_url', $education_page->github_url) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group edu-form-group">
                            <label>GitHub Chart URL</label>
                            <input type="url"
                                name="github_chart_url"
                                class="form-control"
                                value="{{ old('github_chart_url', $education_page->github_chart_url) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group edu-form-group">
                            <label>GitHub Section Title</label>
                            <input type="text"
                                name="github_title"
                                class="form-control"
                                value="{{ old('github_title', $education_page->github_title) }}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group edu-form-group">
                            <label>GitHub Description</label>
                            <textarea name="github_description"
                                class="form-control"
                                rows="2">{{ old('github_description', $education_page->github_description) }}</textarea>
                        </div>
                    </div>

                </div>

                {{-- GITHUB ACTIVITIES --}}
                <div class="edu-dynamic-section">
                    <div class="edu-dynamic-heading">
                        <h5>Technical Activities</h5>
                        <button type="button" class="edu-add-small-btn" id="addActivity">
                            <i class="fas fa-plus"></i> Add Activity
                        </button>
                    </div>

                    <div id="activityRows">
                        @foreach (old('github_activities', $education_page->github_activities ?? []) as $activity)
                            <div class="edu-dynamic-row">
                                <input type="text"
                                    name="github_activities[]"
                                    class="form-control"
                                    value="{{ $activity }}"
                                    placeholder="Enter technical activity">

                                <button type="button" class="edu-remove-small-btn" data-remove-dynamic>
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        {{-- FOCUS CARDS --}}
        <div class="edu-edit-card">

            <div class="edu-edit-card-header">
                <div class="edu-edit-card-icon orange">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <div>
                    <h4>Technical Focus Cards</h4>
                    <p>Manage your technical interests, learning and career goals.</p>
                </div>

                <button type="button" class="edu-add-btn" id="addFocus">
                    <i class="fas fa-plus"></i> Add Focus Card
                </button>
            </div>

            <div class="edu-edit-card-body">
                <div id="focusRows">

                    @foreach (old('focus_cards', $education_page->focus_cards ?? []) as $index => $card)
                        <div class="edu-focus-form">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="form-group edu-form-group">
                                        <label>Card Title</label>
                                        <input type="text"
                                            name="focus_cards[{{ $index }}][title]"
                                            class="form-control"
                                            value="{{ $card['title'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group edu-form-group">
                                        <label>Description</label>
                                        <input type="text"
                                            name="focus_cards[{{ $index }}][description]"
                                            class="form-control"
                                            value="{{ $card['description'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <button type="button" class="edu-remove-small-btn" data-remove-dynamic>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- SAVE ACTIONS --}}
        <div class="edu-edit-footer">
            <div>
                <i class="fas fa-shield-alt"></i>
                Your changes will be saved to the education database.
            </div>

            <div class="edu-edit-footer-actions">
                <a href="{{ route('education_pages.show', $education_page->id) }}" class="edu-cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="edu-save-btn" id="educationSaveButton">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </div>

    </form>

    {{-- EDUCATION ROW TEMPLATE --}}
    <template id="educationTemplate">
        <div class="edu-qualification-form" data-row>

            <div class="edu-qualification-form-header">
                <div>
                    <span class="edu-row-index">NEW RECORD</span>
                    <strong>New Qualification</strong>
                </div>

                <button type="button" class="edu-remove-btn" data-remove-row>
                    <i class="fas fa-trash-alt"></i> Remove
                </button>
            </div>

            <div class="row">

                <div class="col-md-2">
                    <div class="form-group edu-form-group">
                        <label>Year</label>
                        <input type="number" data-name="year" class="form-control" min="1900" max="2100">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group edu-form-group">
                        <label>Degree <span>*</span></label>
                        <input type="text" data-name="degree" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group edu-form-group">
                        <label>Institution <span>*</span></label>
                        <input type="text" data-name="institution" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group edu-form-group">
                        <label>Result</label>
                        <input type="text" data-name="result" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group edu-form-group">
                        <label>Status</label>
                        <select data-name="status" class="form-control">
                            <option>Completed</option>
                            <option>Running</option>
                            <option>On Hold</option>
                            <option>Discontinued</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group edu-form-group">
                        <label>Sort Order</label>
                        <input type="number" data-name="sort_order" class="form-control" min="0">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group edu-form-group">
                        <label>Visibility</label>
                        <select data-name="is_active" class="form-control">
                            <option value="1" selected>Active</option>
                            <option value="0">Hidden</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group edu-form-group">
                        <label>Timeline Description</label>
                        <textarea data-name="timeline_description" class="form-control" rows="2"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </template>

@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const educationRows = document.getElementById('educationRows');
    const educationTemplate = document.getElementById('educationTemplate');
    const educationEmpty = document.getElementById('educationEmpty');
    const addEducation = document.getElementById('addEducation');
    const addEducationEmpty = document.getElementById('addEducationEmpty');
    const activityRows = document.getElementById('activityRows');
    const focusRows = document.getElementById('focusRows');

    let educationIndex = {{ count($educationRows) }};
    let activityIndex = {{ count(old('github_activities', $education_page->github_activities ?? [])) }};
    let focusIndex = {{ count(old('focus_cards', $education_page->focus_cards ?? [])) }};

    function updateEducationState() {
        const rows = educationRows.querySelectorAll('[data-row]');

        educationEmpty.style.display = rows.length ? 'none' : 'block';

        rows.forEach((row, index) => {
            const label = row.querySelector('.edu-row-index');
            if (label) label.textContent = 'RECORD ' + (index + 1);
        });
    }

    function addEducationRow() {
        const index = educationIndex++;
        const fragment = educationTemplate.content.cloneNode(true);
        const row = fragment.querySelector('[data-row]');

        row.querySelectorAll('[data-name]').forEach(input => {
            input.name = `educations[${index}][${input.dataset.name}]`;
        });

        const id = document.createElement('input');
        id.type = 'hidden';
        id.name = `educations[${index}][id]`;
        id.value = '';

        row.insertBefore(id, row.querySelector('.row'));

        const order = row.querySelector('[data-name="sort_order"]');
        if (order) order.value = index + 1;

        educationRows.appendChild(fragment);
        updateEducationState();
    }

    addEducation?.addEventListener('click', addEducationRow);
    addEducationEmpty?.addEventListener('click', addEducationRow);

    educationRows.addEventListener('click', function (event) {
        const button = event.target.closest('[data-remove-row]');
        if (!button) return;

        button.closest('[data-row]').remove();
        updateEducationState();
    });

    function addDynamicRow(container, name, placeholder) {
        const row = document.createElement('div');
        row.className = 'edu-dynamic-row';

        const input = document.createElement('input');
        input.type = 'text';
        input.name = name;
        input.className = 'form-control';
        input.placeholder = placeholder;

        const remove = document.createElement('button');
        remove.type = 'button';
        remove.className = 'edu-remove-small-btn';
        remove.setAttribute('data-remove-dynamic', '');
        remove.innerHTML = '<i class="fas fa-times"></i>';

        row.append(input, remove);
        container.appendChild(row);
    }

    document.getElementById('addActivity')?.addEventListener('click', function () {
        addDynamicRow(activityRows, 'github_activities[]', 'Enter technical activity');
    });

    document.getElementById('addFocus')?.addEventListener('click', function () {
        const index = focusIndex++;
        const row = document.createElement('div');

        row.className = 'edu-focus-form';

        row.innerHTML = `
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="form-group edu-form-group">
                        <label>Card Title</label>
                        <input type="text" name="focus_cards[${index}][title]" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group edu-form-group">
                        <label>Description</label>
                        <input type="text" name="focus_cards[${index}][description]" class="form-control">
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="button" class="edu-remove-small-btn" data-remove-dynamic>
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        `;

        focusRows.appendChild(row);
    });

    document.addEventListener('click', function (event) {
        const button = event.target.closest('[data-remove-dynamic]');
        if (!button) return;

        button.closest('.edu-dynamic-row, .edu-focus-form')?.remove();
    });

    document.getElementById('educationEditForm').addEventListener('submit', function () {
        const button = document.getElementById('educationSaveButton');

        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
    });

    updateEducationState();
});
</script>
@stop
