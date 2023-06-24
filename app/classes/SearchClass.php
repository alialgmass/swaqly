foreach ($traders as $trader) {
      if (isset($trader->product)) {
        foreach ($trader->product as $p) {
          if(in_array($p->name,$names)){
           //  array_push($products, ["name" => $p->name, "price" => $p->price, "trader_id" => $trader->id, 'trader_dictance' => $trader->distance]);
           if (array_key_exists($p->name, $prod))
           {
            array_push($prod[$p->name], ["price" => $p->price,
            "trader_id" => $trader->id, 
            "id"=>$p->id,]);
           }
           else
           {
            $prod[$p->name]=[
             
            ["price" => $p->price,
             "trader_id" => $trader->id, 
             "id"=>$p->id,]];
           }
          
         
        }
      }

    }

    return $this->returnData('products', $prod);
  }
