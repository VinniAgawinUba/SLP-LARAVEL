<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partners;
use App\Models\type;

class PartnersController extends Controller
{
    public function Frontpage_partners()
    {
        $partners = partners::all();
        return view('partners', ['partners_list' => $partners]);
    }
    public function PartnersView()
    {
        $partners = partners::all();
        return view('admin.partners-view', ['partners_list' => $partners]);
    }

    public function PartnersAdd()
    {
        $partner_types = type::all();
        return view('admin.partners-add', ['partnerTypes' => $partner_types]);
    }

    public function PartnersInsert(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_person' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'type_id' => 'required',
        ]);

        // Handle the image upload
        if ($request->hasFile('logo_image')) {
            $image = $request->file('logo_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/partner_logos'), $imageName);
            $validatedData['logo_image'] = $imageName;
        }

        // Create a new Partner model instance and fill it with the validated data
        $newPartner = new partners();
        $newPartner->fill($validatedData);

        // Save the new Partner to the database
        $newPartner->save();

        return redirect()->route('admin.partnersView')->with('success', 'Partner added successfully!');
    }

    public function PartnersEdit(Request $request, $id)
    {
        $partner = partners::find($id);
        $oartner_types = type::all();
        return view('admin.partners-edit', ['partner' => $partner, 'partnerTypes' => $oartner_types]);
    }

    public function PartnersUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'contact_person' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'type_id' => 'required',
        ]);

        // Find the Partner model instance with the id
        $partner = partners::find($id);

        // Handle the image upload
        if ($request->hasFile('logo_image')) {
            // Check if the partner has an old image and delete it
            if ($partner->logo_image && file_exists(public_path($partner->logo_image))) {
                unlink(public_path($partner->logo_image));
            }
        if ($request->hasFile('logo_image')) {
            $image = $request->file('logo_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/partner_logos'), $imageName);
            $validatedData['logo_image'] = $imageName;
            }
        }

        // Update the Partner model instance with the validated data
        $partner->fill($validatedData);

        // Save the updated Partner to the database
        $partner->save();

        return redirect()->route('admin.partnersView')->with('success', 'Partner updated successfully!');
    }

    public function PartnersDelete(Request $request, $id)
    {
       // Find the Faculty model to delete
       $partner = partners::find($request->id);

        // Delete the Partner model instance
        $partner->delete();

        return redirect()->route('admin.partnersView')->with('success', 'Partner deleted successfully!');
    }
}
