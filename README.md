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
    
- Like comment
<code>
<script>
    $(document).ready(function() {
        $('.like').click(function() {
            var id = $(this).data('id');
            var url = "{{ route('like') }}";
            $.ajax({
                url: url,
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('.like[data-id=' + id + ']').html(
                            '<i class="fa-regular fa-thumbs-up"></i> ' + data.likes);
                    }
                }
            });
        })
    })
</script>

if ($request->ajax()) {
            $post = \App\Models\Post::find($request->id);
            $post->likes = $post->likes + 1;
            $post->save();
            return response()->json(
                [
                'status' => 'success',
                'likes' => $post->likes
                ]
            );
        }
</code>
    
 
