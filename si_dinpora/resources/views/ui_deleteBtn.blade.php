<form style="width: 10px; height: 10px; box-shadow: none;" action="" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" style="margin-top: -5px; margin-left: 50px; border: none;"><img
            src="{{ url('') }}/asset/img/icon/aksi/Delete.svg">
    </button>
</form>