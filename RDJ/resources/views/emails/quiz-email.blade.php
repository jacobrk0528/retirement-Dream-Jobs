<div class="m-4 flex flex-col">
    <h3 class="flex justify-center text-3xl">{{ $userDetails['name'] }} Quiz Submission</h3>

    <div class="my-4">
      <h5 class="mb-1 text-xl">Name: {{ $userDetails['name'] }}</h5>
      <h5 class="text-xl">Email: {{ $userDetails['email'] }}</h5>
    </div>

    <div class="border-2 border-black px-4 py-2 bg-teal-100">
      <ol class="list-decimal ml-4">
        <li>
          <h6 class=" text-lg">CHANGE TO QUESTION 1 QUESTION</h6>
          <p class="ml-4 text-lg">-> {{ $results['Question1Answer'] }} </p>
        </li>
        <li>
          <h6 class="mt-8 text-lg">CHANGE TO QUESTION 2 QUESTION</h6>
          <p class="ml-4 text-lg">-> {{ $results['Question2Answer'] }} </p>
        </li>
        <li>
          <h6 class="mt-8 text-lg">CHANGE TO QUESTION 3 QUESTION</h6>
          <p class="ml-4 text-lg">-> {{ $results['Question3Answer'] }} </p>
        </li>
        <li>
          <h6 class="mt-8 text-lg">CHANGE TO QUESTION 4 QUESTION</h6>
          <p class="ml-4 text-lg">-> {{ $results['Question4Answer'] }} </p>
        </li>
        <li>
          <h6 class="mt-8 text-lg">CHANGE TO QUESTION 5 QUESTION</h6>
          <p class="ml-4 text-lg">-> {{ $results['Question5Answer'] }} </p>
        </li>
      </ol>
    </div>
  </div>

<style>
    .m-4 {
        margin: 1rem;
    }
    .flex {
        display: flex;
    }
    .flex-col {
        flex-direction: column;
    }
    .justify-center {
        justify-content: center;
    }
    .text-3xl {
        font-size: 1.875rem;
    }
    .text-xl {
        font-size: 1.25rem;
    }
    .text-lg {
        font-size: 1.125rem;
    }
    .my-4 {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .mb-1 {
        margin-bottom: 0.25rem;
    }
    .border-2 {
        border-style: solid;
        border-width: 2px;
        border-radius: 0.5rem;
    }
    .border-black {
        border-color: #000000;
    }
    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
    .bg-teal-100 {
        background-color: #e6fffa;
    }
    .list-decimal {
        list-style-type: decimal;
    }
    .ml-4 {
        margin-left: 1rem;
    }
    .mt-8 {
        margin-top: 2rem;
    }
</style>
