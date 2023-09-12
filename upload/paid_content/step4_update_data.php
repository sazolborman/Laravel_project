use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

if (!Schema::hasColumn('posts', 'is_free')) {
Schema::table('posts', function (Blueprint $table) {
$table->integer('is_free')->default('1');
});
}
