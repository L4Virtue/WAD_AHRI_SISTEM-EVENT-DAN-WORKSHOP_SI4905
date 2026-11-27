<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Bisa diakses semua user yang login (Admin & User biasa)
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('events.index', compact('events'));
    }

    // Hanya Admin (dicek lewat EventPolicy)
    public function create()
    {
        $this->authorize('create', Event::class);
        return view('events.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Event::class);

        $request->validate([
            'judul_event' => 'required',
            'deskripsi'   => 'required',
            'kategori'    => 'required',
            'silabus'     => 'required',
            'durasi_sesi' => 'required|numeric',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('pesan', 'Data event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $this->authorize('update', $event);

        $request->validate([
            'judul_event' => 'required',
            'deskripsi'   => 'required',
            'kategori'    => 'required',
            'silabus'     => 'required',
            'durasi_sesi' => 'required|numeric',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('pesan', 'Data event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $this->authorize('delete', $event);
        $event->delete();

        return redirect()->route('events.index')->with('pesan', 'Data event berhasil dihapus!');
    }
}