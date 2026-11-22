 @if ($profiles->hasPages())
     <div class="edu-pagination">
         <div>
             Showing {{ $profiles->firstItem() }} to {{ $profiles->lastItem() }}
             of {{ $profiles->total() }} records
         </div>
         {{ $profiles->links() }}
     </div>
 @endif
