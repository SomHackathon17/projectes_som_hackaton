using UnityEngine;
using System.Collections;
using Steerings;

namespace FSM
{
	public class FSM_ANT_SeedRecollection : FiniteStateMachine
	{
		public enum State {INITIAL, WANDERING, GOING_TO_SEED, TRANSPORTING_SEED_TO_NEST};

		public State currentState = State.INITIAL;

        private FSM_ANT_TwoPointsWander fsmAntTwoPointsWander;
        private GameObject seed;

        private ANT_Blackboard blackboard;

        private Seek seek;
        
		void Start ()
		{
            seek = GetComponent<Seek>();
            if (seek == null)
                Debug.LogError(gameObject + " has no Seek attached in " + this);

            fsmAntTwoPointsWander = GetComponent<FSM_ANT_TwoPointsWander>();
            if (fsmAntTwoPointsWander == null)
            {
                fsmAntTwoPointsWander = gameObject.AddComponent<FSM_ANT_TwoPointsWander>();
            }
            
            blackboard = GetComponent<ANT_Blackboard>();
            if (blackboard == null)
                blackboard = gameObject.AddComponent<ANT_Blackboard>();

            seek.enabled = false;
            fsmAntTwoPointsWander.enabled = false;
        }

		public override void Exit () {
            seek.enabled = false;
            fsmAntTwoPointsWander.enabled = false;
            base.Exit();
        }

		public override void ReEnter() {
            currentState = State.INITIAL;
            base.ReEnter();
        }

		// Update is called once per frame
		void Update ()
		{
            switch (currentState)
            {
                case State.INITIAL:
                    ChangeState(State.WANDERING);
                    break;
                case State.WANDERING:
                    seed = SensingUtils.FindInstanceWithinRadius(this.gameObject, "SEED", blackboard.seedDistanceSmallEnough);
                    if (seed != null)
                    {
                        ChangeState(State.GOING_TO_SEED);
                    }                    
                    break;
                case State.GOING_TO_SEED:
                    if (seed.transform.parent == null)
                    {
                        if (SensingUtils.DistanceToTarget(this.gameObject, seed) < blackboard.seedRecollectionDistanceSmallEnough)
                        {
                            ChangeState(State.TRANSPORTING_SEED_TO_NEST);
                        }
                    } else
                    {
                        ChangeState(State.WANDERING);
                    }     
                    break;
                case State.TRANSPORTING_SEED_TO_NEST:
                    if (SensingUtils.DistanceToTarget(this.gameObject, blackboard.nest) < blackboard.nestDistanceSmallEnough)
                    {
                        ChangeState(State.WANDERING);
                    }
                    break;
            }
		}

		void ChangeState (State newState) {
            // exit logic
            switch (currentState)
            {
                case State.WANDERING:
                    fsmAntTwoPointsWander.Exit();
                    break;
                case State.GOING_TO_SEED:
                    seek.enabled = false;
                    break;
                case State.TRANSPORTING_SEED_TO_NEST:
                    seed.transform.parent = null;
                    seed.tag = "DROPPED_SEED";
                    seek.enabled = false;
                    break;
            }

            // enter logic
            switch (newState)
            {
                case State.WANDERING:
                    fsmAntTwoPointsWander.ReEnter();
                    break;
                case State.GOING_TO_SEED:
                    seek.enabled = true;
                    seek.target = seed;
                    break;
                case State.TRANSPORTING_SEED_TO_NEST:
                    seek.enabled = true;
                    seek.target = blackboard.nest;
                    seed.transform.parent = this.transform;
                    break;
            }

			currentState = newState;
		}

	}
}
