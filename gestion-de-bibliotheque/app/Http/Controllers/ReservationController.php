<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
public function reserve($id)
{
$book = Book::findOrFail($id);

$book->update([
'status' => 'reserved',
'user_id' => auth()->user()->id,
]);

return redirect()->back()->with('success', 'Livre réservé avec succès !');
}

public function cancelReservation($id)
{
$book = Book::findOrFail($id);

if ($book->user_id !== auth()->id()) {
return redirect()->back()->with('error', 'Vous ne pouvez pas annuler cette réservation.');
}

$book->update([
'status' => 'available',
'user_id' => null,
]);

return redirect()->back()->with('success', 'Réservation annulée avec succès.');
}
}
