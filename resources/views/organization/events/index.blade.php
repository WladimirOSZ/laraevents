@extends('layouts.panel')
@section('title', 'Eventos')
@section('content')
    <form>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-fill">
                <input type="text" name="search" class="form-control w-50 mr-2" value="{{$search}}" placeholder="Pesquisar...">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
            <a href="{{ route('organization.events.create') }}" class="btn btn-primary">Novo evento</a>
        </div>
    </form>
    <table class="table mt-4">
        <thead class="thead bg-white">
            <tr>
                <th>Nome</th>
                <th>Palestrante</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- CONTEÚDO DA TABELA -->
            @foreach ($events as $event)
                <tr>
                    <td class="align-middle">{{ $event->name }}</td>
                    <td class="align-middle">{{ $event->speaker_name }}</td>
                    <td class="align-middle">{{ $event->start_date_formatted }}</td>
                    <td class="align-middle">{{ $event->end_date_formatted }}</td>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('organization.events.show', $event->id) }}" class="btn mr-2 btn-sm btn-info">
                                <i class="fa fa-eye "></i>
                            </a>
                            <a href="{{ route('organization.events.edit', $event->id) }}" class="btn mr-2 btn-sm btn-primary">
                                <i class="fa fa-edit "></i>
                            </a>
                            <form action="{{ route('organization.events.destroy', $event->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash confirm-submit"></i>
                                </button>
                            </form>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->withQueryString()->links() }}
@endsection


@section('js')
    <script src="{{asset('js/organization/events/index.js')}}">

    </script>
@endsection
