<?php

namespace App\Http\Controllers;

use App\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreFaqQuestionsRequest;
use App\Http\Requests\UpdateFaqQuestionsRequest;

class FaqQuestionsController extends Controller
{
    /**
     * Display a listing of FaqQuestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('faq_question_access')) {
            return abort(401);
        }

        $faq_questions = FaqQuestion::all();

        return view('faq_questions.index', compact('faq_questions'));
    }

    /**
     * Show the form for creating new FaqQuestion.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('faq_question_create')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\FaqCategory::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        return view('faq_questions.create', $relations);
    }

    /**
     * Store a newly created FaqQuestion in storage.
     *
     * @param  \App\Http\Requests\StoreFaqQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqQuestionsRequest $request)
    {
        if (! Gate::allows('faq_question_create')) {
            return abort(401);
        }
        $faq_question = FaqQuestion::create($request->all());


        return redirect()->route('faq_questions.index');
    }


    /**
     * Show the form for editing FaqQuestion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('faq_question_edit')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\FaqCategory::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $faq_question = FaqQuestion::findOrFail($id);

        return view('faq_questions.edit', compact('faq_question') + $relations);
    }

    /**
     * Update FaqQuestion in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqQuestionsRequest $request, $id)
    {
        if (! Gate::allows('faq_question_edit')) {
            return abort(401);
        }
        $faq_question = FaqQuestion::findOrFail($id);
        $faq_question->update($request->all());


        return redirect()->route('faq_questions.index');
    }


    /**
     * Display FaqQuestion.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('faq_question_view')) {
            return abort(401);
        }
        $relations = [
            'categories' => \App\FaqCategory::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $faq_question = FaqQuestion::findOrFail($id);

        return view('faq_questions.show', compact('faq_question') + $relations);
    }


    /**
     * Remove FaqQuestion from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('faq_question_delete')) {
            return abort(401);
        }
        $faq_question = FaqQuestion::findOrFail($id);
        $faq_question->delete();

        return redirect()->route('faq_questions.index');
    }

    /**
     * Delete all selected FaqQuestion at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('faq_question_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = FaqQuestion::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
