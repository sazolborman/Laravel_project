use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

if (!Schema::hasTable('payment_histories')) {
Schema::create('payment_histories', function (Blueprint $table) {
$table->id();
$table->string('item_type')->nullable();
$table->bigInteger('item_id')->nullable();
$table->bigInteger('user_id')->nullable();
$table->double('amount')->nullable();
$table->string('currency')->nullable();
$table->string('identifier')->nullable();
$table->longText('transaction_keys')->nullable();
$table->timestamps();
});
} else {
if (!Schema::hasColumn('payment_histories', 'identifier')) {
Schema::table('payment_histories', function (Blueprint $table) {
$table->string('identifier')->nullable();
});
}
if (!Schema::hasColumn('payment_histories', 'transaction_keys')) {
Schema::table('payment_histories', function (Blueprint $table) {
$table->longText('transaction_keys')->nullable();
});
}
}

$gateways = [
'razorpay' => DB::table('payment_gateways')
->where('identifier', 'razorpay')
->exists(),

'flutterwave' => DB::table('payment_gateways')
->where('identifier', 'flutterwave')
->exists(),

'paytm' => DB::table('payment_gateways')
->where('identifier', 'paytm')
->exists(),
];

$razorpay['public_key'] = 'rzp_test_J60bqBOi1z1aF5';
$razorpay['secret_key'] = 'uk935K7p4j96UCJgHK8kAU4q';
$razorpay_key = json_encode($razorpay);

$flutterwave['public_key'] = 'FLWPUBK_TEST-48dfbeb50344ecd8bc075b4ffe9ba266-X';
$flutterwave['secret_key'] = 'FLWSECK_TEST-1691582e23bd6ee4fb04213ec0b862dd-X';
$flutterwave_key = json_encode($flutterwave);

$paytm['public_key'] = 'ApLWOX88722132489587';
$paytm['secret_key'] = '#iFa7&W_C50VL@aT';
$paytm_key = json_encode($paytm);

$keys = [
'razorpay' => $razorpay_key,
'flutterwave' => $flutterwave_key,
'paytm' => $paytm_key,
];

foreach ($gateways as $key => $gateway) {
if (!$gateway) {
$data = [
'identifier' => $key,
'currency' => 'USD',
'title' => ucfirst($key),
'description' => '',
'keys' => $keys[$key],
'model_name' => ucfirst($key),
'test_mode' => '1',
'status' => '1',
'is_addon' => '0',
];

DB::table('payment_gateways')->insert($data);
}
}

$rows = ['google_analytics_id', 'meta_pixel_id'];
foreach ($rows as $row) {
$query = DB::table('settings')
->where('type', $row)
->exists();
if (!$query) {
DB::table('settings')->insert(['type' => $row, 'description' => '']);
}
}
