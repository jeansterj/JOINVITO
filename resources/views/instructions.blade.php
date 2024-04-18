@extends('layouts.main')

@section('content')
    <h1 class="text-center text-white py-4"> INSTRUCTIONS </h1>
    <div class="d-flex align-items-center justify-content-center py-2"><img src="{{ asset('img/instructionIconCircle.svg') }}"
            alt=""></div>

    <div class="container text-center instructionsMargin">
        <div class="row align-items-start">
            <div class="col">
                <div class="bg-light buttonOrder text-center widthOptions my-2">
                    <h2 class="px-2">How to use the app?</h2>
                </div>

                <div class="d-none">
                    {{ $rolActivo = Auth::user()->rol->nombre }}

                </div>


                @switch($rolActivo)
                    @case('rider')
                    <div id="divRiderV">
                        <video src="{{ asset('img/riderInteractivo.mp4') }}" alt="videoInstructionsRider" controls id="videoRider" class="video"></video>

                    </div>
                        @break

                        @case('centro')
                        <div>
                            <video src="" alt="videoInstructionsCenter"></video>
                            <h1>centro</h1>
                        </div>
                            
                            @break

                        @case('proveedor')
                        <div id="divProvV">
                            <video src="{{ asset('img/videoInteractivoProvider.mp4') }}" alt="videoInstructionsProvider" controls id="videoProvider" class="video"></video>
                        </div>
                            
                             @break


                        @default
                            <h1 class="text-white">Admin</h1>
                @endswitch

                            <div class="row">
                                <div class="bg-light buttonOrder text-center widthOptions my-2">
                                    <h2 class="px-1">How to approach a homeless?</h2>
                                </div>

                                <div class="bg-secondary py-2 buttonOrder d-flex text-white">
                                    <div class="col-6">
                                        <ul class="list-group list-group-numbered text-white px-3 text-start">
                                            <li class="justify-content-between align-items-start py-3">
                                                <div class="row">
                                                    <div class="ms-2 me-auto">
                                                        <div class="fw-bold py-2">
                                                            <h2>Step 1. Educate yourself</h2>
                                                        </div>
                                                        <p>Before approaching homeless people, take the time to educate
                                                            yourself about local resources available to them. Investigate
                                                            local shelters, food banks, and organizations that provide
                                                            support services. This knowledge will help guide them to the
                                                            right assistance.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-start py-3">
                                                <div class="ms-2 me-auto py-2">
                                                    <div class="row">
                                                        <div class="fw-bold">
                                                            <h2>Step 2. Show respect</h2>
                                                        </div>
                                                        <p>Treat homeless people with dignity and respect. Avoid making
                                                            assumptions or judgments about your situation. Remember that
                                                            homelessness can happen to anyone, and it is essential to
                                                            address it without prejudice.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-start py-3">
                                                <div class="ms-2 me-auto py-2">
                                                    <div class="fw-bold">
                                                        <h2>Step 3. Offer assistance</h2>
                                                    </div>
                                                    <p>Start by asking if they need immediate help. It could be as simple as
                                                        providing a meal, a bottle of water, or warm clothing during the
                                                        colder months. Be aware of your space and personal boundaries, and
                                                        always ask before offering any items or help.</p>
                                                </div>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-start py-3 ">
                                                <div class="ms-2 me-auto py-2">
                                                    <div class="fw-bold">
                                                        <h2>Step 4. Engage in a conversation</h2>
                                                    </div>
                                                    <p>Start a conversation to show genuine interest in their story and
                                                        experiences. Ask open-ended questions to encourage them to share
                                                        their thoughts and feelings. Active listening is crucial during
                                                        these interactions as it demonstrates empathy and understanding.</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-6 text-end">
                                        <ul class="list-group list-group-numbered text-white px-3 text-start">
                                            <div class="row">
                                                <li class="d-flex justify-content-between align-items-start py-3">
                                                    <div class="ms-2 me-auto py-2">
                                                        <div class="fw-bold">
                                                            <h2>Step 5. Don't judge</h2>
                                                        </div>
                                                        <p>Avoid making assumptions about the circumstances or decisions
                                                            that led to their homelessness. Instead, focus on their
                                                            immediate needs and how you can help them. Remember, everyone's
                                                            journey is unique and it is not for us to judge.</p>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="row">
                                                <li class="d-flex justify-content-between align-items-start py-3 ">
                                                    <div class="ms-2 me-auto py-2">
                                                        <div class="fw-bold">
                                                            <h2>Step 6. Offer information and resources</h2>
                                                        </div>
                                                        <p>If the person expresses a desire to seek help, provide
                                                            information about local shelters, food banks, or support
                                                            organizations. Offer to make phone calls on their behalf or
                                                            provide them with contact details they can use later.</p>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="row">
                                                <li class="d-flex justify-content-between align-items-start py-3 ">
                                                    <div class="ms-2 me-auto py-2">
                                                        <div class="fw-bold">
                                                            <h2>Step 7. Connect with local organizations</h2>
                                                        </div>
                                                        <p>If you encounter homelessness regularly, consider connecting with
                                                            local organizations that specialize in homelessness. They can
                                                            provide guidance on how to approach and help people effectively.
                                                            Collaborating with these organizations ensures a more
                                                            comprehensive and sustainable approach.</p>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="row">
                                                <li class="d-flex justify-content-between align-items-start py-3 ">
                                                    <div class="ms-2 me-auto py-2">
                                                        <div class="fw-bold">
                                                            <h2>Step 8. Volunteer or Donate</h2>
                                                        </div>
                                                        <p>Consider volunteering your time or donating to local
                                                            organizations that support the homeless population. By
                                                            contributing to these initiatives, you can have a broader impact
                                                            and help address the root causes of homelessness.</p>
                                                    </div>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    </div>
@endsection
