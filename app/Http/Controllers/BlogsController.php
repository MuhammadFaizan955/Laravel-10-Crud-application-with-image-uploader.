<?php



namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $student = Blog::simplepaginate(6);
         return view('layouts', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
{
     $request->validate([
         'title' => 'required',
         'detail' => 'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:1048',
     ]);





      $input = $request->all();

     if  ($image = $request->file('image')){ ; // corrected 'storage' to 'image'
          $destinationPath = 'blog-images/';
          $profileImage =  $image->getClientOriginalExtension();
         $image->move(public_path($destinationPath), $profileImage); // changed to public_path()
          $input['image'] = "$destinationPath$profileImage"; // store relative to public directory
      }

    Blog::create($input);

    return redirect()->route('layouts.index')
                    ->with('success','Product created successfully.');
}




    // Uncomment and implement other methods as needed
     public function show($id)
{
         $content = Blog::find($id);
         return view('show', compact('content'));
}
   // ... (other methods)



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    // public function show(Blog $blog)

        //


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
     public function edit( $id)
     {
         //
         $content =Blog::find($id);
         return view('edit',compact('content') );
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:1048', // Allow optional image update
        ]);

        $content = Blog::find($id);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'blog-images/';
            $profileImage = $image->getClientOriginalName(); // Use original name for consistency
            $image->move(public_path($destinationPath), $profileImage);
            $input['image'] = "$destinationPath$profileImage"; // Update image path in input array
            // Remove old image if exists
            if (file_exists(public_path($content->image))) {
                unlink(public_path($content->image));
            }
        }

        $content->update($input); // Update the content with the new input

        return redirect()->route('layouts.index')->with('success', 'Product updated successfully');
    }

    //
//   $input = $request->all();



//   if  ($image = $request->file('image')){ ; // corrected 'storage' to 'image'
//     $destinationPath = 'blog-images/';
//     $profileImage =  $image->getClientOriginalExtension();
//    $image->move(public_path($destinationPath), $profileImage); // changed to public_path()
//     $input['image'] = "$destinationPath$profileImage"; // store relative to public directory

//       } else {
//           // Handle no image upload (e.g., keep existing or set default)
//       }

//       // ... rest of your update logic using $input ...



//     //   if ($image = $request->file('image')) { // corrected 'storage' to 'image'
//     //       $destinationPath = 'blog-images/';
//     //       $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//     //       $image->move(public_path($destinationPath), $profileImage); // changed to public_path()
//     //       $input['image'] = "$destinationPath$profileImage"; // store relative to public directory
//     //     }else{
//     //         unset($input['image']);
//     //   }
//     $content = Blog::find($id);
//     $content->update($request->all());



//     return redirect()->route('record.index')
//     ->with('success','Product updated successfully');
// }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
     public function destroy(Blog $blog)
     {
         //
    }

    }
