


<div class="col-lg-6 mx-auto">
    <h2>Contacto</h2>
    <form action="{{ route('contact.send') }}" method="POST" class="php-email-form" data-aos="fade-up">
        @csrf
        <div class="form-group">
            <input placeholder="Nombre completo" type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group mt-3">
            <input placeholder="Correo electrónico" type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group mt-3">
            <input placeholder="Asunto" type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}" required>
        </div>
        <div class="form-group mt-3">
            <textarea placeholder="Mensaje" class="form-control" name="message" rows="5" required>{{ old('message') }}</textarea>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center"><button type="submit" class="btn btn-primary mt-3">Enviar</button></div>
    </form>
</div>

