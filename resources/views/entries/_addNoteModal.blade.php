<!-- Modal -->
<div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Additional Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateNote', ['entry' => $entry->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="additional_notes">Additional Notes: </label>
                        <textarea name="additional_notes" rows="9" placeholder="Please Enter Additional Notes" class="form-control">{{ $entry->additional_notes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger btn-waves" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-waves">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>