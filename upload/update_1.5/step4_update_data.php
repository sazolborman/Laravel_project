use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

if (!Schema::hasColumn('users', 'payment_settings')) {
Schema::table('users', function (Blueprint $table) {
$table->longText('payment_settings')->nullable();
});
}

if (Schema::hasTable('author_requests')) {
Schema::dropIfExists('author_requests');
}