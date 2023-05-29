<div class="container mx-auto mt-5">
            <div class="flex justify-center">
                <div class="w-full px-4">
                    <!-- Search box -->
                    <input type="text" class="form-input w-64 mb-4" placeholder="Search Vocabulary or Translate" wire:model="searchTerm">

                    <!-- Paginated records -->
                    <table class="table-auto w-full">
                         <thead>
                              <tr>
                                  <th class="sort py-2" wire:click="sortOrder('id')">Id {!! $sortLink !!}</th>
                                  <th class="sort py-2" wire:click="sortOrder('vocabulary')">Vocabulary {!! $sortLink !!}</th>
                                  <th class="sort py-2" wire:click="sortOrder('translate')">Translate {!! $sortLink !!}</th>
                                  <th class="sort py-2" wire:click="sortOrder('note')">Note {!! $sortLink !!}</th>
                                  <th>Status</th>
                              </tr>
                         </thead>
                         <tbody>
                              @if ($newregister->count())
                                   @foreach ($newregister as $register)
                                        <tr>
                                            <td class="border py-2">{{ $register->id }}</td>
                                            <td class="border py-2">{{ $register->vocabulary }}</td>
                                            <td class="border py-2">{{ $register->translate }}</td>
                                            <td class="border py-2">{{ $register->note }}</td>
                                            <td class="border py-2">{{ $register->created_at }}</td>
                                        </tr>
                                   @endforeach
                              @else
                                   <tr>
                                        <td class="border py-2" colspan="5">No record found</td>
                                   </tr>
                              @endif
                         </tbody>
                    </table>
                    <!-- Pagination navigation links -->
                    <div class="mt-4">
                        {{ $newregister->links() }}
                    </div>
                </div>
            </div>
        </div>