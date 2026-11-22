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