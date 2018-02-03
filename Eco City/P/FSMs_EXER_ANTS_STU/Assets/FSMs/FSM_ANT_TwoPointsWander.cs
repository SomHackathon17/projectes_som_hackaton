using UnityEngine;
using System.Collections;
using Steerings;

namespace FSM
{
	public class FSM_ANT_TwoPointsWander : FiniteStateMachine
	{
		public enum State {INITIAL, GOING_TO_A, GOING_TO_B};

		public State currentState = State.INITIAL;

		private WanderAround wander;
		private ANT_Blackboard blackboard;
		public float elapsedTime = 0f;


		void Start ()
		{
            wander = GetComponent<WanderAround>();
            if (wander == null)
                wander = gameObject.AddComponent<WanderAround>();
            wander.enabled = false;

            blackboard = GetComponent<ANT_Blackboard>();
            if (blackboard == null)
                blackboard = gameObject.AddComponent<ANT_Blackboard>();
        }

		public override void Exit () {
            wander.enabled = false;
            base.Exit();
		}

		public override void ReEnter() {
         
            base.ReEnter();
            currentState = State.INITIAL;
		}

		// Update is called once per frame
		void Update ()
		{
            switch (currentState)
            {
                case State.INITIAL:
                    ChangeState(State.GOING_TO_A);
                    break;
                case State.GOING_TO_A:
                    if (SensingUtils.DistanceToTarget(this.gameObject, blackboard.locationA) < blackboard.distanceSmallEnough)
                    {
                        ChangeState(State.GOING_TO_B);
                    }
                    elapsedTime += Time.deltaTime;
                    if (elapsedTime > 15.0f)
                    {
                        wander.seekWeight += blackboard.seekWeightIncrement;
                        elapsedTime = 0.0f;
                    }

                    break;
                case State.GOING_TO_B:
                    if (SensingUtils.DistanceToTarget(this.gameObject, blackboard.locationB) < blackboard.distanceSmallEnough)
                    {
                        ChangeState(State.GOING_TO_A);
                    }
                    elapsedTime += Time.deltaTime;
                    if (elapsedTime > 15.0f)
                    {
                        wander.seekWeight += blackboard.seekWeightIncrement;
                        elapsedTime = 0.0f;
                    }
                    break;
			}
		}

		void ChangeState (State newState) {
			// exit logic
			switch (currentState) {
			case State.GOING_TO_A:
                    wander.enabled = false;
				break;
			case State.GOING_TO_B:
                    wander.enabled = false;
				break;
			}

            // enter logic
            switch (newState)
            {
                case State.GOING_TO_A:
                    wander.attractor = blackboard.locationA;
                    wander.enabled = true;
                    wander.seekWeight = blackboard.initialSeekWeight;
                    break;
                case State.GOING_TO_B:
                    wander.attractor = blackboard.locationB;
                    wander.enabled = true;
                    wander.seekWeight = blackboard.initialSeekWeight;
                    break;
            }

			currentState = newState;
		}
			


	}
}
