- xài collection của laravel sẽ hay hơn
- Cố gắng xài repository cho dự án để dễ quản lý hơn
- import file excel product detail. Lưu nó trong storage hoặc gg drive
- Tên file lấy trong csdl ra
- Khi gọi tới 1 product thì sử dụng
        <code>
        $fileName = $request->input('file');
        $data = [];
        if ($fileName) {
            $file = storage_path('app/public/files/') . $fileName . '.xlsx';
            $file = Excel::toArray('', $file);
            $key = $file[0][0];
            $value = $file[0][1];
            foreach ($key as $k => $v) {
                $data[$v] = $value[$k] * 2;
            }
        }
        </code>
        
- Lưu file
        <code>
        if ($request->file()) {
            $file = $request->file('file');
            //$name = $file->getClientOriginalName();
            //Name thay thế bằng tên trong csdl
            $file->storeAs('public/files', $name);
            return redirect()->back();
        } else {
            return redirect()->route('test.index');
        }
    </code>
