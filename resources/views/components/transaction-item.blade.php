<div class="flex items-center justify-between py-4 px-2 border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
    <div class="flex items-center space-x-3">
        <div class="p-3 rounded-full {{ $categoryColor }}">
            {!! $categoryIcon !!}
        </div>
        <div>
            <p class="text-sm font-medium text-gray-800">{{ $title }}</p>
            <p class="text-xs text-gray-500">{{ $date }} • {{ $description }}</p>
        </div>
    </div>
    <div class="text-right">
        <p class="text-sm font-semibold {{ $amountColor }}">{{ $amount }}</p>
        <p class="text-xs text-gray-500">{{ $account }}</p>
    </div>
</div>

