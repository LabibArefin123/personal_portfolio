<div class="cr-table-wrapper">
    <table class="table w-100" id="dataTables">
        <thead>
            <tr>
                <th>#</th>
                <th>Client Information</th>
                <th>Phone</th>
                <th>Request Type</th>
                <th>Message Preview</th>
                <th>IP Submissions</th>
                <th>Submitted At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($requests as $requestItem)
                @php
                    $isContact = $requestItem->type === 'contact';
                    $submissionCount = (int) $requestItem->ip_submissions;
                @endphp

                <tr>
                    <td>
                        <span class="cr-row-number">{{ $loop->iteration }}</span>
                    </td>

                    <td>
                        <div class="cr-client-info">

                            <div class="cr-client-avatar">
                                <i class="fas fa-user"></i>
                            </div>

                            <div class="cr-client-details">
                                <strong>
                                    {{ $requestItem->name }}
                                </strong>

                                <span>
                                    <i class="far fa-envelope"></i>
                                    {{ $requestItem->email ?: 'No email provided' }}
                                </span>
                            </div>

                        </div>
                    </td>

                    {{-- PHONE --}}
                    <td>
                        @if ($requestItem->phone)
                            <span class="cr-phone-value">
                                <i class="fas fa-phone-alt"></i>
                                {{ $requestItem->phone }}
                            </span>
                        @else
                            <span class="cr-empty-value">Not provided </span>
                        @endif
                    </td>

                    {{-- REQUEST TYPE --}}
                    <td>
                        <span class="cr-type-badge {{ $isContact ? 'cr-type-contact' : 'cr-type-appointment' }}">
                            <i class="fas {{ $isContact ? 'fa-comment-dots' : 'fa-calendar-check' }}"></i>
                            {{ ucfirst($requestItem->type) }}
                        </span>
                    </td>

                    <td>
                        <div class="cr-message-preview">
                            <span>
                                {{ \Illuminate\Support\Str::limit($requestItem->message, 65) }}
                            </span>
                            <button type="button" class="cr-message-view view-full-message"
                                data-message="{{ $requestItem->message }}" title="View full message">
                                <i class="fas fa-expand-alt"></i>
                            </button>
                        </div>
                    </td>

                    {{-- IP SUBMISSIONS --}}
                    <td>
                        @php
                            $submissionCount = (int) $requestItem->total_count;
                        @endphp

                        <span
                            class="cr-submission-count
                                        {{ $submissionCount >= 5 ? 'cr-count-warning' : 'cr-count-normal' }}">
                            <i class="fas fa-layer-group"></i>

                            <span class="cr-count-value" data-count="{{ $submissionCount }}">
                                {{ $submissionCount }}
                            </span>
                        </span>
                    </td>
                    {{-- CREATED DATE --}}
                    <td>
                        <div class="cr-date-info">

                            <strong>
                                {{ $requestItem->created_at->format('d M Y') }}
                            </strong>

                            <span>
                                <i class="far fa-clock"></i>
                                {{ $requestItem->created_at->format('h:i A') }}
                            </span>

                        </div>
                    </td>

                    {{-- ACTION --}}
                    <td>
                        <a href="{{ route('contact_requests.show', $requestItem->id) }}" class="cr-action-button"
                            title="View request">

                            <i class="fas fa-eye"></i>
                            <span>View</span>

                        </a>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" class="text-center py-5">
                        <div class="cr-empty-state">
                            <i class="fas fa-inbox"></i>
                            <h5>No Contact Requests Found</h5>
                            <p>Submitted requests will appear here.</p>
                        </div>
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>

</div>
