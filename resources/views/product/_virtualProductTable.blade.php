

<table class="table table-sm"
@if(App\Models\ProductConfig::where('unqid',$id)->exists())

@else
hidden
@endif

>


  <thead>
    <?php
    $user= new App\Models\ProductConfig;
    $table = $user->getTable();
    $columns  = \Schema::getColumnListing($table);
    ?>
    <tr>
      @foreach($columns as $ro)
      <th scope="col" style="text-transform: capitalize"

      @if($ro=='id') hidden @endif
      @if($ro=='unqid') hidden @endif
      @if($ro=='created_at') hidden @endif
      @if($ro=='updated_at') hidden @endif

      <?php
        if(App\Models\ProductConfig::where('unqid',$id)->first()){
            $chk=App\Models\ProductConfig::where('unqid',$id)->first();
            ?>
            @if($chk->$ro==null) hidden @endif
            <?php
        }else{}
      ?>

      >{{$ro}}</th>

      @endforeach
      <th scope="col" style="text-transform: capitalize">
        Actions
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach(App\Models\ProductConfig::where('unqid',$id)->get() as $li)
    <tr>
      @foreach($columns as $ro)
        <td

        @if($li->$ro != null) @else hidden @endif

        @if($ro=='id') hidden @endif
        @if($ro=='unqid') hidden @endif
        @if($ro=='created_at') hidden @endif
        @if($ro=='updated_at') hidden @endif


        >{{$li->$ro}}</td>

      @endforeach
      <td> <a onclick="return deleteData('{{$li->id}}');" class="btn btn-sm btn-danger">Delete</a> </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script type="text/javascript">
  function deleteData(id){
    $.ajax({
          type: 'POST',
          url: "{{ url('/deletevirtualproduct') }}",
          data: {
            "_token": "{{ csrf_token() }}",
            id:id
          },
          success: function (data) {
            showTable()
          }
      });
    return false;
  }
</script>
