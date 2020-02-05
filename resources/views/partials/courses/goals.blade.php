<div class="col-12 pt-0 mt-0">
    <h2 class="text-muted">{{ __("Metas del curso") }}</h2>
    <hr/>
</div>
@forelse ($goals as $goal)
    <div class="col-6">
        <div class="xard bg-light p-3">
            <p class="mb-0">
                {{ $goal->goal }}
            </p>
        </div>
    </div>
@empty
    <div class="alert alert-dark">
        <i class="fa fa-info-circle"></i>
        {{ _("No se han definido metas para este curso") }}
    </div>
@endforelse