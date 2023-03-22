<form action="/checkout" method="POST">
  @csrf
  {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
  <button type="submit">Checkout</button>
</form>