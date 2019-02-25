<html>
<title>Products On Database</title>
<head><?php echo date("h:i:sa"); ?></head>
<body>

    <table>
       <thead>
           <tr>
               <th>Name</th>
               <th>Category</th>
               <th>Units</th>
               <th>Price</th>
           </tr>
       </thead>
        <tbody>
            @foreach($data as $product)
            <tr>
                <td>{{$product->name}}></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>