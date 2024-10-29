<div class=" flex items-center justify-center p-4">
  <button id="dropdownDefault" 
    class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
    type="button">
    حسب الصف 
    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
      xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
  </button>

  <!-- Dropdown menu -->
  <div id="dropdown" class="z-10 hidden absolute top-14 right-4 w-56 mt-2 p-3 bg-white rounded-lg shadow">
    <h6 class="mb-3 text-sm font-medium text-gray-900">
      الصف
    </h6>
    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
      <li class="flex items-center">
        <input id="apple" name="class[]" value="10"  type="checkbox"  
          class="w-4 h-4 bg-gray-100 border-gray-300 rounded" />
        <label for="apple" class="mr-2 text-sm font-medium text-gray-900">
          العاشر
        </label>
      </li>
      <li class="flex items-center">
        <input id="fitbit" name="class[]"  value="11"  type="checkbox" 
          class="w-4 h-4 bg-gray-100 border-gray-300 rounded" />
        <label for="fitbit" class="mr-2 text-sm font-medium text-gray-900">
          الحادي عشر
        </label>
      </li>
      <li class="flex items-center">
        <input id="fitbit" name="class[]"  value="12"  type="checkbox"  
          class="w-4 h-4 bg-gray-100 border-gray-300 rounded" />
        <label for="fitbit" class="mr-2 text-sm font-medium text-gray-900">
          الثاني عشر
        </label>
      </li>

      <li class="flex items-center justify-end">
            <button type="submit" class="flex w-1/2 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">بحث</button>
      </li>

    </ul>
  </div>
</div>

