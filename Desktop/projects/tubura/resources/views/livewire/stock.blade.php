<div>
    <a style="margin-bottom:20px" href="{{route('stocks.create')}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @if(count($stocks))
    <thead>
        <tr>
                        
                        
                                    <th>Initial Amount</th>
            
                                    <th>Current Amount</th>
            
                        
                        
                        
                        
                     
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @endif
    <tbody>

    @forelse($stocks as $stock)
    <tr>
                            <td>{{$stock->initial_amount}}</td>
                <td>{{$stock->current_amount}}</td>
                                        


    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{route('stocks.edit',['stock'=>$stock] )}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{route('stocks.show',['stock'=>$stock] )}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-stock-{{$stock->id}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-stock-{{$stock->id}}" action="{{route('stocks.destroy',['stock'=>$stock])}}" method="POST" style="display: none;">
@csrf
@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @empty
    <p>No Stocks</p>
</tr>
    @endforelse
       

    <tbody>    

    </table>     
</div>
