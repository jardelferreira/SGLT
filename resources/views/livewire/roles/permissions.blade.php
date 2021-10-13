<blockquote class="blockquote">
    <p class="mb-0"><i class="fas fa-tachometer-fastest    "></i>Cadastro de Funções 
        <i class="fa fa-arrow-right" aria-hidden="true"></i> Projeto
        <button class="btn btn-success" wire:click="resetInputs()" data-toggle="modal" data-target="#createModal">Cadastrar nova Permissão</button>
    </p>
        <footer class="blockquote-footer"> <cite title="Source Title"></cite>Projeto</footer>
    </blockquote>
    <hr />
        <table class="table table-striped bg-light mt-2 table-responsive">
            <thead>
                <tr>
                    <th>Permissões</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $value)
                <tr>
                    <td>
                    <input type="checkbox" @if ($role->hasPermissionTo($value->id))
                        checked
                    @endif name="" id="">    {{ $value->name }}
                    </td>
                    <td>TEste</td>
                </tr>
                @endforeach
            </tbody>
        </table>