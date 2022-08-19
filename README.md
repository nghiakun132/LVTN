- xài collection của laravel sẽ hay hơn
- Cố gắng xài repository cho dự án để dễ quản lý hơn
- sử dụng object cho product detail
ví dụ:
 $object = new stdClass();
        $object->name = $request->name;
        $object->ram = $request->ram;
        $object->rom = $request->rom;
        $object->screen = $request->screen;
        $object->battery = $request->battery;
        $object->price = $request->price;
        $object->color = $request->color;

        $test = new test();
        $test->pro_id = rand(1,100);
        $test->detail = json_encode($object);
        $test->save();
        return redirect()->route('test.index');
    }
