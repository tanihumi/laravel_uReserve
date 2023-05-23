<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      イベント詳細
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <div class="max-w-2xl mx-auto py-4">
          <x-validation-errors class="mb-4" />

          @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
          </div>
          @endif

          <form method="post" action="{{ route('events.reserve', ['id' => $event->id]) }}">
            @csrf

            <div class="mt-4">
              <x-label for="event_name" value="イベント名" />
              {{ $event->name }}
            </div>

            <div class="mt-4">
              <x-label for="information" value="イベント詳細" />
              {!! nl2br(e($event->information)) !!}
            </div>

            <div class="md:flex justify-between mt-4">
              <div>
                <x-label for="event_date" value="イベント日付" />
                {{ $event->eventDate }}
              </div>

              <div>
                <x-label for="start_time" value="開始時間" />
                {{ $event->startTime }}
              </div>

              <div>
                <x-label for="end_time" value="終了時間" />
                {{ $event->endTime }}
              </div>
            </div>

            <div class="md:flex justify-between items-end mt-4">
              <div>
                <x-label for="max_people" value="定員" />
                {{ $event->max_people }}
              </div>

              <div>
                @if ($reservablePeople <= 0) <spna class="tet-xs text-red-500">このイベントは満員です。</span>
                  @else
                  <x-label for="reserved_people" value="予約人数" />
                  <select name="reserved_people">
                    @for ($i = 1; $i <= $reservablePeople; $i++) <option value="{{$i}}">{{$i}}</option>
                      @endfor

                  </select>
                  @endif
              </div>

              @if($isReserved === null)

              <input type="hidden" name="id" value="{{ $event->id }}">
              @if ($reservablePeople > 0)
              <x-button class="ml-4">
                予約する
              </x-button>
              @endif

              @else
              このイベントは予約済です。
              @endif

            </div>

        </div>


        </form>

      </div>


    </div>

  </div>


</x-app-layout>