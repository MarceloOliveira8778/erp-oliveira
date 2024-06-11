@php 
/* arquivo descontinuado, porém guardado para possíveis futuros erros. */

use App\Http\Controllers\ProdutoController;

ob_clean();
header('Content-Type: application/json');

$pc = new ProdutoController();
echo $pc->pesquisar();

@endphp
