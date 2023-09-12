use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

if (!Schema::hasColumn('invites', 'fundraiser_id')) {
Schema::table('invites', function (Blueprint $table) {
$table->integer('fundraiser_id')->nullable();
});
}

if (!Schema::hasColumn('notifications', 'fundraiser_id')) {
Schema::table('notifications', function (Blueprint $table) {
$table->integer('fundraiser_id')->nullable();
});
}

if (!Schema::hasColumn('shares', 'fundraiser_id')) {
Schema::table('shares', function (Blueprint $table) {
$table->integer('fundraiser_id')->nullable();
});
}
