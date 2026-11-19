 <div class="pi-table-wrapper">
     <table class="table w-100" id="dataTables">
         <thead>
             <tr>
                 <th class="pi-number-column">#</th>
                 <th>Project</th>
                 <th>Images</th>
                 <th>Status</th>
                 <th class="pi-action-column">Actions</th>
             </tr>
         </thead>

         <tbody>
             @forelse ($informations as $key => $info)
                 <tr class="pi-table-row">
                     <td class="pi-number-cell">
                         {{ $loop->iteration }}
                     </td>
                     <td>
                         <div class="pi-project-info">
                             <div class="pi-project-icon">
                                 <i class="fas fa-project-diagram"></i>
                             </div>

                             <div class="pi-project-details">
                                 <strong>
                                     {{ $info->project?->title ?? 'Project Not Available' }}
                                 </strong>

                                 <span>Project Information</span>
                             </div>
                         </div>
                     </td>

                     <td>
                         @if (!empty($info->project_images) && count($info->project_images))
                             <div class="pi-image-gallery">

                                 @foreach (array_slice($info->project_images, 0, 4) as $img)
                                     <a href="{{ asset($img) }}" target="_blank" rel="noopener noreferrer"
                                         class="pi-image-item" title="View project image">
                                         <img src="{{ asset($img) }}" alt="Project image" loading="lazy">
                                     </a>
                                 @endforeach

                                 @if (count($info->project_images) > 4)
                                     <span class="pi-image-more">
                                         +{{ count($info->project_images) - 4 }}
                                     </span>
                                 @endif
                             </div>
                         @else
                             <span class="pi-no-images">
                                 <i class="far fa-image"></i>
                                 No Images
                             </span>
                         @endif
                     </td>

                     <td>
                         <span class="pi-status-badge {{ $info->status ? 'pi-status-active' : 'pi-status-inactive' }}">
                             <span class="pi-status-dot"></span>
                             {{ $info->status ? 'Active' : 'Inactive' }}
                         </span>
                     </td>

                     <td>
                         <div class="pi-action-group">
                             <a href="{{ route('project-informations.show', $info->id) }}"
                                 class="pi-action-btn pi-view-btn" title="View Details">
                                 <i class="fas fa-eye"></i>
                                 <span>View</span>
                             </a>

                             <a href="{{ route('project-informations.edit', $info->id) }}"
                                 class="pi-action-btn pi-edit-btn" title="Edit Project Information">
                                 <i class="fas fa-edit"></i>
                                 <span>Edit</span>
                             </a>

                             <form method="POST" action="{{ route('project-informations.destroy', $info->id) }}"
                                 class="pi-delete-form"
                                 onsubmit="return confirm('Are you sure you want to delete this project information?')">

                                 @csrf
                                 @method('DELETE')

                                 <button type="submit" class="pi-action-btn pi-delete-btn"
                                     title="Delete Project Information">
                                     <i class="fas fa-trash-alt"></i>
                                     <span>Delete</span>
                                 </button>
                             </form>
                         </div>
                     </td>
                 </tr>

             @empty
                 <tr>
                     <td colspan="5">
                         <div class="pi-empty-state">
                             <div class="pi-empty-icon">
                                 <i class="fas fa-folder-open"></i>
                             </div>

                             <h5>No Project Information Found</h5>

                             <p>
                                 Start by adding information and images
                                 for your projects.
                             </p>

                             <a href="{{ route('project-informations.create') }}" class="pi-empty-create-btn">
                                 <i class="fas fa-plus"></i>
                                 Create First Record
                             </a>
                         </div>
                     </td>
                 </tr>
             @endforelse
         </tbody>
     </table>
 </div>
