<div
x-data="{show: true}"
x-init="setTimeout(() => show = false, 3000)"
x-show="show"
x-transition
class="alert alert-{{ $type }} text-white font-bold">
    <h2>{{ $message }}</h2>
</div>
