<div class="row">
    <div class="d-inline">
        <a class="button-edit text-info" href="{{ route('admin.orders.edit', $id) }}"><i class="fas fa-edit ml-2"></i></a>
{{--        <a class="button-show" href="{{ route('admin.orders.show', $id) }}"><i class="fas fa-eye ml-2"></i></a>--}}
        <a class="button-destroy text-danger btn-delete" href="{{ route('admin.orders.destroy', $id) }}"><i class="fas fa-trash ml-2"></i></a>
    </div>
</div>
