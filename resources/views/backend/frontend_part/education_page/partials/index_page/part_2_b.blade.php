<div class="table-responsive">
    <table class="table edu-index-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Page Information</th>
                <th>Academic Highlight</th>
                <th>GitHub</th>
                <th>Status</th>
                <th>Updated</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($profiles as $profile)
                <tr>
                    <td>
                        <span class="edu-row-number">
                            {{ $profiles->firstItem() + $loop->index }}
                        </span>
                    </td>

                    <td>
                        <div class="edu-profile-cell">
                            <div class="edu-profile-avatar">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div>
                                <strong>{{ $profile->title }}</strong>
                                <small>{{ Str::limit($profile->subtitle, 55) }}</small>
                            </div>
                        </div>
                    </td>

                    <td>
                        <strong class="edu-highlight-value">
                            {{ $profile->highlight_value ?? 'Not configured' }}
                        </strong>
                        <small class="edu-muted d-block">
                            {{ $profile->highlight_label }}
                        </small>
                    </td>

                    <td>
                        @if ($profile->github_username)
                            <span class="edu-github-label">
                                <i class="fab fa-github"></i>
                                {{ $profile->github_username }}
                            </span>
                        @else
                            <span class="text-muted">Not connected</span>
                        @endif
                    </td>

                    <td>
                        @if ($profile->is_active)
                            <span class="edu-status active">
                                <i class="fas fa-check-circle"></i> Active
                            </span>
                        @else
                            <span class="edu-status inactive">
                                <i class="fas fa-pause-circle"></i> Inactive
                            </span>
                        @endif
                    </td>

                    <td>
                        <span class="edu-date">
                            {{ $profile->updated_at?->format('d M Y') }}
                        </span>
                    </td>

                    <td>
                        <div class="edu-action-group">
                            <a href="{{ route('education_pages.show', $profile->id) }}" class="edu-action-btn view"
                                title="View">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('education_pages.edit', $profile->id) }}" class="edu-action-btn edit"
                                title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <div class="edu-empty-state">
                            <i class="fas fa-graduation-cap"></i>
                            <h5>No Education Profile Found</h5>
                            <p>Run the EducationSeeder to create your initial profile.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
