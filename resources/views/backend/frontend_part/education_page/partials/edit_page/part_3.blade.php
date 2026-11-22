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
                $educationRows = old(
                    'educations',
                    $educations
                        ->map(function ($item) {
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
                        })
                        ->toArray(),
                );
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

                    <input type="hidden" name="educations[{{ $index }}][id]" value="{{ $item['id'] ?? '' }}">

                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group edu-form-group">
                                <label>Year</label>
                                <input type="number" name="educations[{{ $index }}][year]" class="form-control"
                                    value="{{ $item['year'] ?? '' }}" min="1900" max="2100">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group edu-form-group">
                                <label>Degree <span>*</span></label>
                                <input type="text" name="educations[{{ $index }}][degree]"
                                    class="form-control" value="{{ $item['degree'] ?? '' }}" required>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group edu-form-group">
                                <label>Institution <span>*</span></label>
                                <input type="text" name="educations[{{ $index }}][institution]"
                                    class="form-control" value="{{ $item['institution'] ?? '' }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group edu-form-group">
                                <label>Result</label>
                                <input type="text" name="educations[{{ $index }}][result]"
                                    class="form-control" value="{{ $item['result'] ?? '' }}">
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
                                <input type="number" name="educations[{{ $index }}][sort_order]"
                                    class="form-control" value="{{ $item['sort_order'] ?? $index + 1 }}"
                                    min="0">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group edu-form-group">
                                <label>Visibility</label>
                                <select name="educations[{{ $index }}][is_active]" class="form-control">
                                    <option value="1" {{ !empty($item['is_active']) ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0" {{ empty($item['is_active']) ? 'selected' : '' }}>
                                        Hidden</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group edu-form-group">
                                <label>Timeline Description</label>
                                <textarea name="educations[{{ $index }}][timeline_description]" class="form-control" rows="2">{{ $item['timeline_description'] ?? '' }}</textarea>
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
