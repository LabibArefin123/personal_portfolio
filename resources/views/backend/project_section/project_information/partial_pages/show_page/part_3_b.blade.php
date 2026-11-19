{{-- TECHNOLOGIES & LANGUAGES --}}
<div class="col-lg-6 mb-4">
    <section class="pi-show-detail-card pi-search-card" id="piTechCard"
        data-search-url="{{ route('project-informations.search_items', $projectInformation->id) }}">

        <div class="pi-show-detail-header">
            <div class="pi-show-detail-icon pi-language-icon">
                <i class="fas fa-code"></i>
            </div>

            <div>
                <h4>Technologies & Languages</h4>
                <p>Tools and technologies used</p>
            </div>

            <span class="pi-show-count" id="piTechCount">
                {{ count($languages) }}
            </span>
        </div>

        <div class="pi-search-toolbar">
            <div class="pi-search-input-wrap">
                <i class="fas fa-search pi-search-icon"></i>

                <input type="search" id="piTechSearch" class="pi-detail-search-input"
                    placeholder="Search technologies..." autocomplete="off">

                <button type="button" class="pi-search-clear" id="piTechClear" aria-label="Clear technology search"
                    hidden>
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <span class="pi-search-hint" id="piTechHint">
                Showing all technologies
            </span>
        </div>

        <div class="pi-show-detail-body pi-show-language-list pi-search-scroll pi-tech-scroll" id="piTechResults">

            @forelse ($languages as $item)
                <span class="pi-show-language-tag pi-search-result">
                    <i class="fas fa-code-branch"></i>
                    <span class="pi-search-result-text">{{ $item }}</span>
                </span>
            @empty
                <div class="pi-show-inline-empty">
                    <i class="fas fa-code"></i>
                    No languages added yet.
                </div>
            @endforelse

        </div>

        <div class="pi-search-loading" id="piTechLoading" hidden>
            <span class="pi-search-spinner"></span>
            Searching technologies...
        </div>

    </section>
</div>
