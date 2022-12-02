@props([
    'model' => null
])

<div class="d-flex align-items-center justify-content-center pb-4">
    {{ $model->links('vendor.pagination.bootstrap-4') }}
</div>
