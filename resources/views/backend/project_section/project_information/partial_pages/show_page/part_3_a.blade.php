<div class="col-lg-6 mb-4">
    <section class="pi-show-detail-card pi-search-card" id="piFeatureCard"
        data-search-url="{{ route('project-informations.search_items', $projectInformation->id) }}">

        <div class="pi-show-detail-header">
            <div class="pi-show-detail-icon pi-feature-icon">
                <i class="fas fa-star"></i>
            </div>

            <div>
                <h4>Key Features</h4>
                <p>Important project capabilities</p>
            </div>

            <span class="pi-show-count" id="piFeatureCount">
                {{ count($features) }}
            </span>
        </div>

        <div class="pi-search-toolbar">
            <div class="pi-search-input-wrap">
                <i class="fas fa-search pi-search-icon"></i>

                <input type="search" id="piFeatureSearch" class="pi-detail-search-input"
                    placeholder="Search project features..." autocomplete="off">

                <button type="button" class="pi-search-clear" id="piFeatureClear" aria-label="Clear feature search"
                    hidden>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <span class="pi-search-hint" id="piFeatureHint">
                Showing all features
            </span>
        </div>

        <div class="pi-show-detail-body pi-search-scroll" id="piFeatureResults">

            @forelse ($features as $item)
                <div class="pi-show-list-item pi-search-result">
                    <span class="pi-show-list-check">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="pi-search-result-text">{{ $item }}</span>
                </div>
            @empty
                <div class="pi-show-inline-empty">
                    <i class="far fa-star"></i>
                    No features added yet.
                </div>
            @endforelse

        </div>

        <div class="pi-search-loading" id="piFeatureLoading" hidden>
            <span class="pi-search-spinner"></span>
            Searching features...
        </div>

    </section>
</div>
