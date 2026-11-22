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
                                <input type="text" name="focus_cards[{{ $index }}][title]"
                                    class="form-control" value="{{ $card['title'] ?? '' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group edu-form-group">
                                <label>Description</label>
                                <input type="text" name="focus_cards[{{ $index }}][description]"
                                    class="form-control" value="{{ $card['description'] ?? '' }}">
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
