<div class="table-responsive">
    <table class="table" id="entryForms-table">
        <thead>
            <tr>
                <th>Furigana</th>
                <th>Bs Id</th>
                <th>所属</th>
                <th>Birth Day</th>
                <th>Gender</th>
                <th>Zip</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Cellphone</th>
                <th>50Km Exp</th>
                <th>Parent Name</th>
                <th>Parent Name Furigana</th>
                <th>Parent Relation</th>
                <th>Emer Phone</th>
                <th>Sm Name</th>
                <th>Sm Position</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($entryForms as $entryForm) --}}
                <tr>
                    <td>{{ $entryForm->furigana }}</td>
                    <td>{{ $entryForm->bs_id }}</td>
                    <td>{{ $entryForm->district }} 地区 {{ $entryForm->dan_name }} {{ $entryForm->dan_number }}</td>
                    <td>{{ $entryForm->birth_day }}</td>
                    <td>{{ $entryForm->gender }}</td>
                    <td>{{ $entryForm->zip }}</td>
                    <td>{{ $entryForm->address }}</td>
                    <td>{{ $entryForm->telephone }}</td>
                    <td>{{ $entryForm->cellphone }}</td>
                    <td>{{ $entryForm->exp_50km }}</td>
                    <td>{{ $entryForm->parent_name }}</td>
                    <td>{{ $entryForm->parent_name_furigana }}</td>
                    <td>{{ $entryForm->parent_relation }}</td>
                    <td>{{ $entryForm->emer_phone }}</td>
                    <td>{{ $entryForm->sm_name }}</td>
                    <td>{{ $entryForm->sm_position }}</td>
                    <td width="120">
                        @if($entryForm->id)
                        {!! Form::open(['route' => ['entryForms.destroy', $entryForm->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('entryForms.show', [$entryForm->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('entryForms.edit', [$entryForm->id]) }}"
                                class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
