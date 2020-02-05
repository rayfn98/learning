<div class="row mb-4">
    <div class="col-md-12">
        <div class="card" style="background-img: url(' {{ url('/image/jumbotron.png') }} ')">
            <div class="text-white text-center d-flex align-items-center py-5 px-4 my-5">
                <div class="col-5">
                    <img src="{{ $course->pathAttachment() }}" alt="{{ $course->name }}" class="img-fluid">
                </div>
                <div class="col-5 text-left">
                    <h1>{{ __("Curso") }}: {{ $course->name }}</h1>
                    <h4>{{ __("Profesor") }}: {{ $course->teacher->user->name }}</h4>
                    <h5>{{ __("Categoría") }}: {{ $course->category->name }}</h5>
                    <h5>{{ __("Fecha de publicación") }}: {{ $course->created_at->format('d/m/Y') }}</h5>
                    <h5>{{ __("Última actualización") }}: {{ $course->updated_at->format('d/m/Y') }}</h5>
                    <h6>{{ __("Estudiantes Inscritos") }}: {{ $course->students_count }}</h6>
                    <h6>{{ __("Valoraciones") }}: {{ $course->reviews_count }}</h6>
                    @include('partials.courses.rating')
                </div>

                @include('partials.courses.action_button')
            </div>
        </div>
    </div>
</div>