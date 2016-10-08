@extends('layout')
@section('content')

<div id="content">

  <a href="/project">Проекты<a>
  <a href="/fs">Проводник</a>
  <hr/>
  Проект: {{$name_project}}<br/><br/>
  <a href="/">Файлы</a>
  <a href="/fields/{{$id_project}}">Данные</a>
  <hr/>

  <input id="upload" type='button' value='Загрузить'/>
{{-- <input id="add" type='button' value='Добавить'/> --}}
<input id="del" type='button' value='Удалить'/>
{{-- <input id="recog" type='button' value='Распознать'/> --}}
{{-- <input id="verif" type='button' value='Верифицировать'/>
<input id="check" type='button' value='Проверить'/>--}}
<input id="del" type='button' value='Выгрузить'/>
  <br/>
  <br/>

    <table class="list">
      <thead>
        <tr>
          <th><input type="checkbox" id="all_check" /></th>
{{--
  	      <th>#</th>
--}}
	        <th>Файл</th>
	        <th>Распознано</th>
	        <th>Верифицировано</th>
        </tr>
      </thead>
      <tbody id="data">

      </tbody>
    </table>
</div>

<script id="image_tpl" type="text/template">
  <td>
    <input type="checkbox" class="select_image"/>
            {{--<%= (checked) ? 'checked':'' %>/>--}}
    </td>
    <td><%= name %></td>
    <td><%= recog %></td>
    <td> <%= verif %></td>
</script>

@endsection