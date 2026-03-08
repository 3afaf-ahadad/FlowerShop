<form action="{{ route('checkout.store') }}" method="POST">
    @csrf

    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prenom" required>
    <input type="text" name="adresse" placeholder="Adresse" required>
    <input type="text" name="telephone" placeholder="Telephone" required>

    <button type="submit">Commander</button>

</form>