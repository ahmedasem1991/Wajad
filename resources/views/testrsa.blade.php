<form action="{{ route('validrsa') }}" method="POST">
    @csrf
    <input type="text" name="rsa" style="width:100%;font-size:25px;padding:5px;">
    <input type="submit" value="Valid">
</form>
